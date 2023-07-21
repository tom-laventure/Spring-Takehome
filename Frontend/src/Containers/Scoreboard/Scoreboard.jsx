import { useEffect, useState } from "react";
import styles from "./Scoreboard.module.scss";
import Score from "../../Components/Score/Score";
import instance from "../../Assets/axios/axios-instance";
import CreateUserPopup from "../../Components/Common/Popups/CreateUserPopup/CreateUserPopup";
import SearchBar from "../../Components/SearchBar/SearchBar";

const Scoreboard = () => {
	const [scores, setScores] = useState([]);
	const [addUser, setAddUser] = useState(false);
	const controller = new AbortController();

	useEffect(() => {
		instance
			.get("/user-score", { signal: controller.signal })
			.then((res) => setScores(res.data.data));

		return () => controller.abort();
	}, []);

	const updateScores = (id, point, index) => {
		setScores((oldState) => {
			const newState = [...oldState];
			const newPoints = newState[index].points + point;

			newState[index].points = newPoints;
			newState.sort((a, b) => b.points - a.points);

			instance.patch(`/user-score/${id}`, { points: newPoints });

			return newState;
		});
	};

	const sortScores = (sort) => {
		setScores((oldState) => {
			const newState = [...oldState];

			if (sort === "points") newState.sort((a, b) => b.points - a.points);
			else {
				newState.sort((a, b) => {
					if (b.name > a.name) return -1;
					else if (b.name < a.name) return 1;

					return 0;
				});
			}
			return newState;
		});
	};

	const searchScores = (value) => {
		instance
			.get(`/user-score?search=${value}`, { signal: controller.signal })
			.then((res) => setScores(res.data.data));
	};

	const deleteScore = (id) => {
		instance.delete(`/user-score/${id}`).then(() => {
			setScores((oldState) => {
				return oldState.filter((item) => item.id !== id);
			});
		});
	};

	return (
		<div className={styles["scoreboard"]}>
			<SearchBar
				getScores={searchScores}
				cancelCall={() => controller.abort()}
			/>
			<table className={styles["scoreboard--scores"]}>
				<thead>
					<tr>
						<th></th>
						<th
							className={styles["scoreboard--header"]}
							onClick={() => sortScores("name")}
						>
							Name
						</th>
						<th></th>
						<th
							className={styles["scoreboard--header"]}
							onClick={() => sortScores("points")}
						>
							Points
						</th>
					</tr>
				</thead>
				<tbody>
					{scores.map((item, key) => {
						return (
							<Score
								key={key}
								name={item.name}
								points={item.points}
								id={item.id}
								updateScores={updateScores}
								age={item.age}
								address={item.address}
								index={key}
								deleteScore={() => deleteScore(item.id)}
							/>
						);
					})}
				</tbody>
			</table>
			<div className={styles["scoreboard--add-user"]}>
				<button onClick={() => setAddUser(true)}>+ Add User</button>
			</div>
			{addUser && (
				<CreateUserPopup
					close={() => setAddUser(false)}
					setUsers={setScores}
				/>
			)}
		</div>
	);
};

export default Scoreboard;

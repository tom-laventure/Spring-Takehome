import PropType from "prop-types";
import styles from "./Score.module.scss";

const Score = ({
	name,
	points,
	age,
	address,
	id,
	updateScores,
	index,
	deleteScore,
	qrCode,
	displayUser,
}) => {
	return (
		<tr className={styles["score"]}>
			<td>
				<button onClick={deleteScore}>X</button>
			</td>
			<td className={styles["score--name"]}>
				<h3
					onClick={() =>
						displayUser({
							age: age,
							points: points,
							address: address,
							name: name,
							qrCode: qrCode
						})
					}
				>
					{name}
				</h3>
			</td>
			<td className={styles["score--point-buttons"]}>
				<button onClick={() => updateScores(id, 1, index)}>+</button>
				<button onClick={() => updateScores(id, -1, index)}>-</button>
			</td>
			<td>
				<div className={styles["score--points"]}>{points} points</div>
			</td>
		</tr>
	);
};

Score.propTypes = {
	name: PropType.string,
	points: PropType.number,
	id: PropType.number,
	updateScores: PropType.func,
	index: PropType.number,
};

export default Score;

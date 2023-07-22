import PropType from "prop-types";
import styles from "./Score.module.scss";
import { useState } from "react";
import DisplayUserPopup from "../Common/Popups/DisplayUserPopup/DisplayUserPopup";

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
}) => {
	const [userDetails, setUserDetails] = useState(false);

	return (
		<tr className={styles["score"]}>
			<td>
				<button onClick={deleteScore}>X</button>
			</td>
			<td className={styles["score--name"]}>
				<h3 onClick={() => setUserDetails(true)}>{name}</h3>
			</td>
			<td className={styles["score--point-buttons"]}>
				<button onClick={() => updateScores(id, 1, index)}>+</button>
				<button onClick={() => updateScores(id, -1, index)}>-</button>
			</td>
			<td>
				<div className={styles["score--points"]}>{points} points</div>
			</td>
			{userDetails && (
				<DisplayUserPopup
					age={age}
					points={points}
					address={address}
					name={name}
					close={() => setUserDetails(false)}
					qrCode={qrCode}
				/>
			)}
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

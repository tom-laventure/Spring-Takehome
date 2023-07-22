import AppLabel from "../../AppLabel/AppLabel";

import Popup from "../Popup";
import styles from "../Popup.module.scss";

const DisplayUserPopup = ({ close, age, name, address, points, qrCode }) => {
	return (
		<Popup close={close}>
			<div>
				<h2>User Details</h2>
				<div>
					<div className={styles["popup--label-group"]}>
						<AppLabel label="Name:" />
						<div>{name}</div>
					</div>
					<div className={styles["popup--label-group"]}>
						<AppLabel label="Address:" />
						<div>{address}</div>
					</div>
					<div className={styles["popup--label-group"]}>
						<AppLabel label="Age:" />
						<div>{age}</div>
					</div>
					<div className={styles["popup--label-group"]}>
						<AppLabel label="Points:" />
						<div>{points}</div>
					</div>
					<div className={styles["popup--label-group"]}>
						<AppLabel label="QR Code:" />
						<img src={qrCode} />
					</div>
				</div>
			</div>
		</Popup>
	);
};

export default DisplayUserPopup;

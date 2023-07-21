import { useState } from "react";
import AppLabel from "../../AppLabel/AppLabel";
import AppText from "../../AppText/AppText";
import Popup from "../Popup";
import styles from "../Popup.module.scss";
import instance from "../../../../Assets/axios/axios-instance";

const CreateUserPopup = ({ close, setUsers }) => {
	const [formState, setFormState] = useState({
		name: "",
		address: "",
		age: 0,
		points: 0,
	});

	const updateFormState = (e) =>
		setFormState({ ...formState, [e.target.name]: e.target.value });

	const createUser = (e) => {
		e.preventDefault();
		const formData = { ...formState };
		if (isNaN(formData.age)) return;
		formData.age = parseInt(formData.age);
		instance.post("/user-score", { ...formData });
		setUsers((oldState) => {
			const newState = [...oldState];
			newState.push(formData);
			return newState;
		});
		close();
	};

	return (
		<Popup close={close}>
			<h2>Create User</h2>
			<form
				className={styles["popup--form"]}
				onSubmit={(e) => createUser(e)}
			>
				<AppLabel label="Name" />
				<div className={styles["popup--input-group"]}>
					<AppText
						value={formState.name}
						onChange={updateFormState}
						name="name"
					/>
				</div>
				<AppLabel label="Address" />
				<div className={styles["popup--input-group"]}>
					<AppText
						value={formState.address}
						onChange={updateFormState}
						name="address"
					/>
				</div>
				<AppLabel label="Age" />
				<div className={styles["popup--input-group"]}>
					<AppText
						value={formState.age}
						onChange={updateFormState}
						name="age"
					/>
				</div>
				<button className={styles["popup--create-user"]} type="submit">
					Create User
				</button>
			</form>
		</Popup>
	);
};

export default CreateUserPopup;

import styles from "./AppText.module.scss";

const AppText = ({ onChange, name, value }) => {
	return (
		<input
			className={styles["app-text"]}
			type="text"
			name={name}
			onChange={(e) => onChange(e)}
			value={value}
		/>
	);
};

export default AppText;

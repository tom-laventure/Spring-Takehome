import styles from "./AppLabel.module.scss"

const AppLabel = ({ label }) => {
	return <label className={styles["app-label"]}>{label}</label>
}

export default AppLabel
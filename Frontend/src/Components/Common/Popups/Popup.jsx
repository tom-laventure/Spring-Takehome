import styles from "./Popup.module.scss";

const Popup = ({ children, close }) => {
	return (
		<div className={styles["popup--container"]} onClick={() => close()}>
			<div
				className={styles["popup"]}
				onClick={(e) => e.stopPropagation()}
			>
				{children}
			</div>
		</div>
	);
};

export default Popup;

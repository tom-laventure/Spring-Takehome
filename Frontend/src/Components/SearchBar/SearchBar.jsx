import { useEffect, useRef, useState } from "react";
import AppLabel from "../Common/AppLabel/AppLabel";
import AppText from "../Common/AppText/AppText";
import styles from "./SearchBar.module.scss";

const SearchBar = ({ getScores, cancelCall }) => {
	const [search, setSearch] = useState("");
	const firstLoad = useRef(true);

	useEffect(() => {
		if (firstLoad.current) {
			firstLoad.current = false;
		} else {
			getScores(search);
		}

		return () => cancelCall();
	}, [search]);

	return (
		<div className={styles["search-bar"]}>
			<AppLabel label="Search:" />
			<AppText
				onChange={(e) => setSearch(e.target.value)}
				value={search}
			/>
		</div>
	);
};

export default SearchBar;

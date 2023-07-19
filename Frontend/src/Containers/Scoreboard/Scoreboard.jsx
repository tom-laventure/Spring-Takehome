import { useState } from 'react';
import PropTypes from 'prop-types'
import styles from './Scoreboard.module.scss'
import Score from '../../Components/Score/Score';

const Scoreboard = () => {
    const [scores] = useState([
        {
            name: 'Emma',
            points: 0
        },
        {
            name: 'Noah',
            points: 0
        }
    ])

    return (
        <div className={styles['scoreboard']}>
            <div className={styles['scoreboard--headers']}>
                <button><h2>Name</h2></button>
                <button><h2>Points</h2></button>
            </div>
            <Scores scores={scores}/>
            <div className={styles['scoreboard--add-user']}>
                <button>+ Add User</button>
            </div>
        </div>
      );
}

const Scores = ({scores}) => {
    return (
        <div className={styles['scoreboard--scores']}>
            {scores.map((item, key) => {
                return <Score key={key} name={item.name} points={item.points}/>
            })}
        </div>
    )
}

Scores.propTypes = {
    scores: PropTypes.array
}


 
export default Scoreboard;
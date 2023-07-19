import PropType from 'prop-types'
import styles from './Score.module.scss'

const Score = ({name, points, id}) => {
    

    return (
        <div className={styles['score']}>
            <button>X</button>
            <h3>{name}</h3>
            <button>+</button>
            <button>-</button>
            <div>{points} points</div>
            {id}
        </div>
      );
}

Score.propTypes = {
    name: PropType.string,
    points: PropType.number,
    id: PropType.string
}
 
export default Score;

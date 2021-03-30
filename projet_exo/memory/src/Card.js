import React from 'react'
import PropTypes from 'prop-types'
import './Card.css'

const HIDDEN_SYMBOL = '❓'

const Card = ({card, feedback, onClick}) => (

        <div className={`card ${feedback}`} onClick={() => onClick(card)}>
            <span className="card">
                {feedback === 'hidden' ? HIDDEN_SYMBOL : card}
            </span>
        </div>

)

Card.propTypes = {
    card: PropTypes.string.isRequired,
    feedback: PropTypes.oneOf([
        'hidden',
        'visible',
        'justMatched',
        'justMissed'
    ]).isRequired,
        onClick: PropTypes.func.isRequired,
    }


export default Card

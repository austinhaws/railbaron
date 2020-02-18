import React, {useContext} from 'react';
import ClassesContext from "../../app/jss/ClassesContext";
import PropTypes from "prop-types";

const propTypes = {
    player: PropTypes.object.isRequired,
};
const defaultProps = {};

const PlayerPayout = ({player}) => {
    const classes = useContext(ClassesContext);
console.log({player});
    return (
        <div className={classes.payout__container}>
        </div>
    );
};

PlayerPayout.propTypes = propTypes;
PlayerPayout.defaultProps = defaultProps;

export default PlayerPayout;

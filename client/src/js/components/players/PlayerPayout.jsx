import React, {useContext} from 'react';
import ClassesContext from "../../app/jss/ClassesContext";
import PropTypes from "prop-types";
import formatPayout from "./formatPayout";
import Icon from "../../misc/Icon";
import {observer} from "mobx-react";

const propTypes = {
    player: PropTypes.object.isRequired,
};
const defaultProps = {};

const PlayerPayout = observer(({player}) => {
    const classes = useContext(ClassesContext);
    return (
        <div className={classes.payout__container}>
            <div className={classes.payout__container__payout}>${formatPayout(player.payout.payout)}</div>
            <div>{Icon.arrow(classes.payout__container__arrow)}</div>
        </div>
    );
});

PlayerPayout.propTypes = propTypes;
PlayerPayout.defaultProps = defaultProps;

export default PlayerPayout;

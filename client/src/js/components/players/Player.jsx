import React, {useContext} from 'react';
import ClassesContext from "../../app/jss/ClassesContext";
import Icon from "../../misc/Icon";
import PlayerCity from "./PlayerCity";
import PropTypes from "prop-types";
import tinycolor from "tinycolor2";
import PlayerPayout from "./PlayerPayout";

const propTypes = {
    player: PropTypes.object.isRequired
};
const defaultProps = {};

const Player = ({player}) => {
    const classes = useContext(ClassesContext);

    return (
        <div className={classes.player__container}>
            <div className={classes.player__container__player}>
                {Icon.garbage()}
                {Icon.taw({style: {stroke: player.tawColor, fill: tinycolor(player.tawColor).lighten(10)}})}
                <span className={classes.player__container__name}>{player.name}</span>
                <PlayerCity
                    player={player}
                    whichCity="home"
                    showDice={true}
                    iconSide="right"
                />
            </div>
            <div className={classes.player__container__cities}>
                <PlayerCity
                    player={player}
                    whichCity="from"
                    showDice={false}
                    iconSide="left"
                />

                <PlayerPayout player={player}/>

                <PlayerCity
                    player={player}
                    whichCity="to"
                    showDice={true}
                    iconSide="right"
                />
            </div>
        </div>
    );
};

Player.propTypes = propTypes;
Player.defaultProps = defaultProps;

export default Player;

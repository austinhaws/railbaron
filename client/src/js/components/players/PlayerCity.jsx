import React, {useContext} from 'react';
import ClassesContext from "../../app/jss/ClassesContext";
import Icon from "../../misc/Icon";
import PropTypes from "prop-types";
import {joinClassNames} from "dts-react-common";

const propTypes = {
    player: PropTypes.object.isRequired,
    whichCity: PropTypes.string.isRequired,
    showDice: PropTypes.bool.isRequired,
    iconSide: PropTypes.oneOf(['right', 'left']).isRequired,
};
const defaultProps = {};

const PlayerCity = ({player, whichCity, showDice, iconSide}) => {
    const classes = useContext(ClassesContext);
    const city = player[`${whichCity}City`];

    return (
        <div className={joinClassNames(classes.player_city__container, iconSide === 'left' ? classes.player_city__container_left : undefined)}>
            <div className={classes.player_city__container__name}>
                {city.name}
            </div>
            <div className={classes.player_city__container__pencil}>
                {Icon.pencil()}
            </div>
            {
                showDice ?
                    <div>{
                        Icon.dice({
                            border: classes.player_city__container__dice__border,
                            pip: classes.player_city__container__dice__pip,
                        })
                    }</div> :
                    undefined
            }
        </div>
    );
};

PlayerCity.propTypes = propTypes;
PlayerCity.defaultProps = defaultProps;

export default PlayerCity;

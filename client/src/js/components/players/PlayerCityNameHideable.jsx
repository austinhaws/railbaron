import React, {useContext, useEffect, useRef, useState} from 'react';
import ClassesContext from "../../app/jss/ClassesContext";
import PropTypes from "prop-types";
import {observer} from "mobx-react";
import PlayerCityName from "./PlayerCityName";

const propTypes = {
    city: PropTypes.object.isRequired,
};
const defaultProps = {
};

const PlayerCityNameHideable = observer(({city}) => {
    const classes = useContext(ClassesContext);
    const [showHomeName, setShowHomeName] = useState(false);
    const showHomeTimeoutId = useRef(NaN);
    const showHomeIntervalId = useRef(NaN);
    const [timeRemaining, setTimeRemaining] = useState(NaN);

    useEffect(() => () => {
        showHomeIntervalId.current && clearInterval(showHomeIntervalId.current);
        showHomeTimeoutId.current && clearTimeout(showHomeTimeoutId.current);
    }, []);

    const showHomeCity = () => {
        if (showHomeTimeoutId.current) {
            clearTimeout(showHomeTimeoutId.current);
        }
        setShowHomeName(true);
        setTimeRemaining(10);
        showHomeTimeoutId.current = setTimeout(() => {
            setShowHomeName(false);
            clearInterval(showHomeIntervalId.current);
            showHomeIntervalId.current = NaN;
        }, 10000);
        if (!showHomeIntervalId.current) {
            showHomeIntervalId.current = setInterval(() => setTimeRemaining(timeRemainingPrev => Math.max(0, (timeRemainingPrev || 10) - 1)), 1000);
        }
    };

    return (
        <div onClick={showHomeCity}>
            {
                (!showHomeName) ?
                    <div className={classes.player_container__home_city__show__name}>Press to Show City</div> :
                    <div className={classes.player_container__home_city__show}>
                        <div className={classes.player_container__home_city__show__countdown}>{timeRemaining}</div>
                        <PlayerCityName city={city}/>
                    </div>
            }
        </div>
    );
});

PlayerCityNameHideable.propTypes = propTypes;
PlayerCityNameHideable.defaultProps = defaultProps;

export default PlayerCityNameHideable;

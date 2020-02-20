import React, {useContext} from 'react';
import ClassesContext from "../../app/jss/ClassesContext";
import PropTypes from "prop-types";
import {observer} from "mobx-react";

const propTypes = {
    city: PropTypes.object.isRequired,
};
const defaultProps = {
};

const PlayerCityName = observer(({city}) => {
    const classes = useContext(ClassesContext);

    return (
        <div className={classes.player_city__container__name}>{city.region.abbreviation} {city.name}</div>
    );
});

PlayerCityName.propTypes = propTypes;
PlayerCityName.defaultProps = defaultProps;

export default PlayerCityName;

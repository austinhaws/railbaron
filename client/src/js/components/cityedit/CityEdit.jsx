import React, {useContext, useEffect, useState} from 'react';
import ClassesContext from "../../app/jss/ClassesContext";
import MobContext from "../../app/mobx/MobContext";
import {observer} from "mobx-react";
import PropTypes from "prop-types";
import webservice from "../../app/webservice/Webservice";
import Icon from "../../misc/Icon";
import Pages from "../../app/pages/Pages";

const propTypes = {
    playerId: PropTypes.oneOfType([PropTypes.number, PropTypes.string]).isRequired,
    cityType: PropTypes.string.isRequired,
};
const defaultProps = {};

const CityEdit = observer(({playerId, cityType}) => {
    const classes = useContext(ClassesContext);
    const {gameStore} = useContext(MobContext);
    const [city, setCity] = useState(null);
    const [player, setPlayer] = useState(null);
    const [regions, setRegions] = useState(null);

    useEffect(() => {
        const thePlayer = gameStore.game && {...gameStore.game.players.find(playerLoop => playerLoop.id === playerId)};
        setPlayer(thePlayer);
        setCity(thePlayer && {...thePlayer[`${cityType}City`]});

        if (!regions) {
            webservice.region.get(undefined, true).then(setRegions)
        }
    }, [playerId, cityType, gameStore.game]);

    const randomCity = regionId => webservice.city.random(regionId).then(setCity);
    const randomRegion = () => webservice.region.random().then(region => randomCity(region.id));

    return (
        <div>
            <div className={classes.sync_game__title}>{player && player.name}</div>

            <div className={classes.sync_game__label}>
                Region
            </div>
            <div className={classes.city_edit__input}>
                <select
                    value={(city && city.region && city.region.id) || undefined}
                    onChange={e => {
                        setCity({...city, region: {...city.region, id: e.target.value}});
                        randomCity(e.target.value);
                    }}
                >
                    {regions && regions.map(region => <option key={region.id} value={region.id}>{region.name}</option>)}
                </select>
                <div onClick={randomRegion}>
                    {Icon.dice({
                        border: classes.player_city__container__dice__border,
                        pip: classes.player_city__container__dice__pip,
                    })}
                </div>
            </div>

            <div className={classes.sync_game__label}>
                City
            </div>
            <div className={classes.city_edit__input}>
                <select
                    value={(city && city.id) || undefined}
                    onChange={e => setCity({...city, id: e.target.value})}
                    className={classes.sync_game__input__select}
                >
                    {
                        regions && regions.filter(region => region.id === city.region.id)
                                .flatMap(region => region.cities)
                                .map(cityLoop => <option key={cityLoop.id} value={cityLoop.id}>{cityLoop.name}</option>)
                    }
                </select>
                <div onClick={() => randomCity(city.region.id)}>
                    {Icon.dice({
                        border: classes.player_city__container__dice__border,
                        pip: classes.player_city__container__dice__pip,
                    })}
                </div>
            </div>

            <div className={classes.sync_game__buttons}>
                <div onClick={Pages.public.home.forward}>Cancel</div>
                <div
                    className={classes.sync_game__buttons__done}
                    onClick={() => {
                        webservice.player.save({...player, [`${cityType}City`]: city, [`${cityType}CityId`]: city.id})
                            .then(newPlayer => {
                                gameStore.game.players.forEach((playerLoop, i) => {
                                    if (playerLoop.id === playerId) {
                                        gameStore.game.players[i] = newPlayer;
                                    }
                                });
                                Pages.public.home.forward();
                            });
                    }}
                >Done</div>
            </div>
        </div>
    );
});

CityEdit.propTypes = propTypes;
CityEdit.defaultProps = defaultProps;

export default CityEdit;

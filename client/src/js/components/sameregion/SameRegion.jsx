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
};
const defaultProps = {};

const SameRegion = observer(({playerId}) => {
    const classes = useContext(ClassesContext);
    const {gameStore} = useContext(MobContext);
    const [city, setCity] = useState(null);
    const [player, setPlayer] = useState(null);
    const [regions, setRegions] = useState(null);

    useEffect(() => {
        const thePlayer = gameStore.game && {...gameStore.game.players.find(playerLoop => playerLoop.id === playerId)};
        setPlayer(thePlayer);
        setCity(thePlayer && {...thePlayer['toCity']});

        if (!regions) {
            webservice.region.get(undefined, true).then(setRegions)
        }
    }, [playerId, gameStore.game]);

    const randomCity = regionId => webservice.city.random(regionId).then(setCity);
    const randomRegion = () => webservice.region.random().then(region => randomCity(region.id));

    return (
        <div>
            <div className={classes.sync_game__title}>Same Region Rolled!</div>
            <div className={classes.sync_game__blurb}>
                You rolled the same region you are already in. Pick the region to which you would like to go.
            </div>

            <div className={classes.sync_game__label}>
                Current Region
            </div>
            <div className={classes.sync_game__blurb}>{player && player.toCity.region.name}</div>


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

            <div className={classes.sync_game__buttons}>
                <div onClick={Pages.public.home.forward}>Cancel</div>
                <div
                    className={classes.sync_game__buttons__done}
                    onClick={() => {
                        webservice.player.save({...player, ['toCity']: city, ['toCityId']: city.id})
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

SameRegion.propTypes = propTypes;
SameRegion.defaultProps = defaultProps;

export default SameRegion;

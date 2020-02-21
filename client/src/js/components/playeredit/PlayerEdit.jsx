import React, {useContext, useEffect, useState} from 'react';
import ClassesContext from "../../app/jss/ClassesContext";
import MobContext from "../../app/mobx/MobContext";
import {observer} from "mobx-react";
import PropTypes from "prop-types";
import Pages from "../../app/pages/Pages";
import webservice from "../../app/webservice/Webservice";

const propTypes = {
    playerId: PropTypes.oneOfType([PropTypes.number, PropTypes.string]).isRequired,
};
const defaultProps = {};

const PlayerEdit = observer(({playerId}) => {
    const classes = useContext(ClassesContext);
    const {gameStore} = useContext(MobContext);
    const [player, setPlayer] = useState(undefined);

    useEffect(() => {
        setPlayer(gameStore.game && {...gameStore.game.players.find(playerLoop => playerLoop.id === playerId)});
    }, [playerId, gameStore.game]);

    return (
        <div>
            <div className={classes.sync_game__label}>
                Player Name
            </div>

            <div className={classes.sync_game__input}>
                <input
                    type="text"
                    value={(player && player.name) || ''}
                    onChange={e => setPlayer({...player, ...{name: e.target.value}})}
                />
            </div>

            <div className={classes.sync_game__label}>
                Taw Color
            </div>

            <div className={classes.sync_game__input}>
                <select
                    value={(player && player.tawColor) || ''}
                    onChange={e => setPlayer({...player, ...{tawColor: e.target.value}})}
                >
                    <option value={'#00fff0'}>Aqua</option>
                    <option value={'#000000'}>Black</option>
                    <option value={'#0000ff'}>Blue</option>
                    <option value={'#00ff00'}>Green</option>
                    <option value={'#ff9700'}>Orange</option>
                    <option value={'#ff00D6'}>Pink</option>
                    <option value={'#8000ff'}>Purple</option>
                    <option value={'#ff0000'}>Red</option>
                    <option value={'#fffA00'}>Yellow</option>
                </select>
            </div>

            <div className={classes.sync_game__buttons}>
                <div onClick={Pages.public.home.forward}>Cancel</div>
                <div
                    className={classes.sync_game__buttons__done}
                    onClick={() => {
                        const gamePlayer = gameStore.game.players.find(playerLoop => playerLoop.id === playerId);
                        gamePlayer.name = player.name;
                        gamePlayer.tawColor = player.tawColor;
                        webservice.player.save(gamePlayer);
                        Pages.public.home.forward();
                    }}
                >Done</div>
            </div>
        </div>
    );
});

PlayerEdit.propTypes = propTypes;
PlayerEdit.defaultProps = defaultProps;

export default PlayerEdit;

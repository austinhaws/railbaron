import React, {useContext, useRef, useState} from 'react';
import ClassesContext from "../../app/jss/ClassesContext";
import {mobContextValue} from "../../app/mobx/MobContext";
import {observer} from "mobx-react";
import Pages from "../../app/pages/Pages";
import webservice from "../../app/webservice/Webservice";
import {joinClassNames} from "dts-react-common";

export default observer(() => {
    const classes = useContext(ClassesContext);
    const [gameExists, setGameExists] = useState(true);
    const timeoutId = useRef(NaN);

    return (
        <div className={classes.sync_game}>
            <div className={classes.sync_game__title}>Sync Game</div>

            <div className={classes.sync_game__blurb}>
                Syncing allows all players to use their own device to connect and play the same
                game. Give the “Sync Code” to all players and have them enter the code on
                their Sync Game page. All players will see each other’s changes.
            </div>

            <div className={classes.sync_game__label}>
                Sync Code
            </div>

            <div className={classes.sync_game__input}>
                <input
                    type="text"
                    value={(mobContextValue.gameStore.game && mobContextValue.gameStore.game.phrase) || ''}
                    onChange={e => {
                        setGameExists(null);
                        mobContextValue.gameStore.game.phrase = e.target.value;
                        if (timeoutId.current) {
                            clearTimeout(timeoutId.current);
                        }
                        timeoutId.current = setTimeout(
                            () => webservice.game.get(mobContextValue.gameStore.game.phrase, false)
                                .then(game => setGameExists(!!game))
                            , 500
                        );
                    }}
                />
            </div>

            <div className={joinClassNames(
                classes.sync_game__game_exists,
                gameExists ? classes.sync_game__game_exists__exists : classes.sync_game__game_exists__not_exists
            )}>
                {gameExists ? 'Game exists!' : (gameExists === false ? 'Game not found' : '')}
            </div>

            <div className={classes.sync_game__buttons}>
                <div onClick={Pages.public.home.forward}>Cancel</div>
                <div
                    className={joinClassNames(
                        classes.sync_game__buttons__done,
                        !gameExists && classes.sync_game__buttons__done__disabled
                    )}
                    onClick={() => {
                        if (gameExists) {
                            if (timeoutId.current) {
                                clearTimeout(timeoutId.current);
                            }
                            webservice.game.get(mobContextValue.gameStore.game.phrase)
                                .then(Pages.public.home.forward);
                        }
                    }}
                >Done</div>
            </div>
        </div>
    );
});

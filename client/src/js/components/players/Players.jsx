import React, {useContext} from 'react';
import ClassesContext from "../../app/jss/ClassesContext";
import MobContext from "../../app/mobx/MobContext";
import {observer} from "mobx-react";
import Player from "./Player";

export default observer(() => {
    const classes = useContext(ClassesContext);
    const {gameStore} = useContext(MobContext);
    return (
        <div className={classes.players__container}>
            {gameStore.game && gameStore.game.players.map((player, i) => <Player key={i} player={player}/>)}
        </div>
    );
});

import React, {useContext} from 'react';
import Players from "../players/Players";
import ClassesContext from "../../app/jss/ClassesContext";
import startNewGame from "./function/startNewGame";
import Pages from "../../app/pages/Pages";

export default () => {
    const classes = useContext(ClassesContext);
    return (
        <div className={classes.home}>
            <Players/>
            <div className={classes.home__doily}>
                <img src="img/doily.png"/>
            </div>
            <div className={classes.home__button__container}>
                <div
                    className={classes.home__button__container__button}
                    onClick={startNewGame}
                >
                    <img src="img/head.png"/>
                    <div className={classes.home__button__container__button__title}>New Game</div>
                </div>
                <div
                    className={classes.home__button__container__button}
                    onClick={() => Pages.public.syncGame.forward()}
                >
                    <img src="img/train.png"/>
                    <div className={classes.home__button__container__button__title}>Sync Game</div>
                </div>
            </div>
        </div>
    );
}

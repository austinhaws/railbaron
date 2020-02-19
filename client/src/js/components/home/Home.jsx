import React, {useContext} from 'react';
import Players from "../players/Players";
import ClassesContext from "../../app/jss/ClassesContext";
import startNewGame from "./function/startNewGame";

export default () => {
    const classes = useContext(ClassesContext);
    return (
        <>
            <Players/>
            <div className={classes.home__button__container}>
                <div
                    className={classes.home__button__container__button}
                    onClick={startNewGame}
                >
                    <img src="img/head.png"/>
                    <div className={classes.home__button__container__button__title}>New Game</div>
                </div>
            </div>
        </>
    );
}

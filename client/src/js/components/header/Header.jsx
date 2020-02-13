import "core-js/stable";
import React, {useContext} from 'react';
import ClassesContext from "../../app/jss/ClassesContext";

export default () => {
    const classes = useContext(ClassesContext);

    return (
        <div className={classes.header}>
            <div className={classes.header__squidee} onClick={() => window.location = 'https://rpggenerator.com'}>
                <img src="img/squidee.png" alt="RPG Generator Logo"/>
                <div className={classes.header__squidee__rpggenerator}>
                    RPG Generator
                </div>
            </div>
            <div className={classes.header__title}>
                <img src="img/title.png" alt="RPG Generator - Rail Baron Title"/>
            </div>
        </div>
    );
};

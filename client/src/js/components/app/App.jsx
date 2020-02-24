import "core-js/stable";
import React, {useContext, useEffect, useRef} from 'react';
import {render} from 'react-dom';
import {BrowserRouter, Switch, withRouter} from 'react-router-dom';
import PropTypes from "prop-types";
import {Helmet} from "react-helmet";
import ContextProvider from "../../app/ContextProvider";
import MobContext from "../../app/mobx/MobContext";
import {observer} from "mobx-react";
import Pages, {renderPageRoutes} from "../../app/pages/Pages";
import Header from "../header/Header";
import ClassesContext from "../../app/jss/ClassesContext";
import webservice from "../../app/webservice/Webservice";
import gamePhrase from "../../app/graphql/util/gamePhrase";

const propTypes = {
    history: PropTypes.object.isRequired,
};
const defaultProps = {};
const REFRESH_SECONDS = 60 * 3;

const AppClass = observer(({history}) => {
    const {appStore, historyStore} = useContext(MobContext);
    const classes = useContext(ClassesContext);
    const intervalId = useRef(NaN);

    useEffect(() => {
        if (!history) {
            console.error("history does not exist for app");
        }
        historyStore.history = history;

        if (gamePhrase()) {
            webservice.game.get();
        } else {
            webservice.game.startNewGame();
        }
        intervalId.current = setInterval(() => webservice.game.get(), REFRESH_SECONDS * 1000);

        return () => clearInterval(intervalId.current);
    }, []);

    return (
        <div className={classes.app__content}>
            <div className={classes.app__content__container}>
                <Helmet>
                    <title>{appStore.pageTitle}</title>
                </Helmet>

                <Header/>

                <div>
                    <Switch>
                        {renderPageRoutes(Pages.public)}
                    </Switch>
                </div>
            </div>
        </div>
    );
});

AppClass.propTypes = propTypes;
AppClass.defaultProps = defaultProps;

const App = withRouter(AppClass);

const div = document.createElement('div');
document.body.appendChild(div);
render(<BrowserRouter basename={'/'}><ContextProvider><App/></ContextProvider></BrowserRouter>, div);

import "core-js/stable";
import React, {useContext, useEffect} from 'react';
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

const propTypes = {
    history: PropTypes.object.isRequired,
};
const defaultProps = {};

const AppClass = observer(({history}) => {
    const {appStore, historyStore} = useContext(MobContext);
    const classes = useContext(ClassesContext);

    useEffect(() => {
        if (!history) {
            console.error("history does not exist for app");
        }
        historyStore.history = history;
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

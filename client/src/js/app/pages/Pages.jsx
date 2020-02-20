import React from "react";
import Home from "../../components/home/Home";
import {Route} from "react-router-dom";
import Page from "./Page";
import {mobContextValue} from "../mobx/MobContext";
import SyncGame from "../../components/syncgame/SyncGame";

export default {
	public: {
        syncGame: new Page({
            Component: SyncGame,
            forward: () => mobContextValue.historyStore.history.push('/syncGame'),
            path: '/syncGame',
            title: 'Sync Game',
        }),
		home: new Page({
			Component: Home,
			forward: () => mobContextValue.historyStore.history.push(`/`),
			path: '/',
			title: 'Rail Baron',
		}),
	},
};

export const renderPageRoutes = pages => Object.values(pages).map(page => (
    <Route
        key={page.path}
        path={page.path}
        component={page.render}
    />
));

import React from "react";
import Home from "../../components/home/Home";
import {Route} from "react-router-dom";
import Page from "./Page";
import {mobContextValue} from "../mobx/MobContext";

export default {
	public: {
		home: new Page({
			Component: Home,
			forward: () => mobContextValue.historyStore.history.forward(`/`),
			path: '/',
			title: 'Rail Baron',
		}),
	},
};

export const renderPageRoutes = pages => Object.values(pages).map(page => <Route key={page.path} path={page.path} component={page.render}/>);

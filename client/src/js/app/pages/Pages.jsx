import React from "react";
import History from "../../app/history/History";
import Home from "../../pages/Home";
import {Route} from "react-router-dom";
import Page from "./Page";

export default {
	public: {
		home: new Page({
			component: Home,
			forward: () => History.forward(`/`),
			path: '/',
			title: 'Rail Baron',
		}),
	},
};

export const renderPageRoutes = pages => Object.values(pages).map(page => <Route key={page.path} path={page.path} component={page.render}/>);

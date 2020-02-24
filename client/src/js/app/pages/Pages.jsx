import React from "react";
import Home from "../../components/home/Home";
import {Route} from "react-router-dom";
import Page from "./Page";
import {mobContextValue} from "../mobx/MobContext";
import SyncGame from "../../components/syncgame/SyncGame";
import PlayerEdit from "../../components/playeredit/PlayerEdit";
import CityEdit from "../../components/cityedit/CityEdit";
import SameRegion from "../../components/sameregion/SameRegion";

export default {
	public: {
        cityEdit: new Page({
            Component: CityEdit,
            forward: (playerId, cityType) => mobContextValue.historyStore.history.push(`/cityEdit/${playerId}/${cityType}`),
            path: '/cityEdit/:playerId/:cityType',
            title: 'City Edit',
        }),
        playerEdit: new Page({
            Component: PlayerEdit,
            forward: playerId => mobContextValue.historyStore.history.push(`/playerEdit/${playerId}`),
            path: '/playerEdit/:playerId',
            title: 'Player Edit',
        }),
        sameRegion: new Page({
            Component: SameRegion,
            forward: playerId => mobContextValue.historyStore.history.push(`/sameRegion/${playerId}`),
            path: '/sameRegion/:playerId',
            title: 'Same Region',
        }),
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

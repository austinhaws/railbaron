import React from 'react';
import {Switch} from 'react-router-dom';
import Pages, {renderPageRoutes} from "./pages/Pages";

class AppRoutes extends React.Component {
	render() {
		return (
			<Switch>
				{renderPageRoutes(Pages.public)}
			</Switch>
		);
	}
}

export default AppRoutes;

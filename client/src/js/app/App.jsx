import "core-js/stable";
import React from 'react';
import {render} from 'react-dom';
import {BrowserRouter, withRouter} from 'react-router-dom';
import PropTypes from "prop-types";
import History from "./history/History";
import {Helmet} from "react-helmet";

const propTypes = {
	history: PropTypes.object.isRequired,
	app: PropTypes.object.isRequired,
};
const defaultProps = {};
const mapStateToProps = state => ({app: state.app});

class AppClass extends React.Component {

	componentDidMount(){
		if (!this.props.history) {
			console.error("history does not exist for app");
		}
		History.set(this.props.history);

		// Webservice.dataList().then(data => {
		// 	const dataLists = {
		// 		certifications: setupRawDataList(data.certifiers),
		// 		counties: setupRawDataList(data.counties),
		// 		insuranceTypes: setupRawDataList(data.insuranceTypes),
		// 		providerTypes: setupRawDataList(data.providerTypes),
		// 		roles: setupRawDataList(data.roles),
		// 		status: setupRawDataList(data.statuses),
		// 	};
		// 	dispatchField("dataLists", dataLists);
		// });
	}

	render() {
		return (
			<div>
				<Helmet>
					{/*<title>{this.props.app.pageTitle}</title>*/}
				</Helmet>

				<main className="main-content-wrapper">
                    Hello WOrld!
					{/*<AppRoutes />*/}
				</main>
			</div>
		);
	}
}

AppClass.propTypes = propTypes;
AppClass.defaultProps = defaultProps;

const App = withRouter(connect(mapStateToProps)(AppClass));

// This will correctly set the basename so router works, if you're using an awesome vhost or not
const div = document.createElement('div');
document.body.appendChild(div);
render(<BrowserRouter basename={'/'}><App/></BrowserRouter>, div);

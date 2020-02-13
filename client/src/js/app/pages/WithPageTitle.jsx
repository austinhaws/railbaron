import React from "react";


export default (WrappedComponent, title) => class extends React.Component {
	componentDidMount() {
		dispatchField('app.pageTitle', `RPGGenerator - ${title}`);
	}

	render() {
		return <WrappedComponent {...this.props} />;
	}
};

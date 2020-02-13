import {AjaxStatusCore, GraphQLCore, MessagePopupCore, objectAtPath} from "dts-react-common";
import webserviceContext from "./webserviceContext";

export const ajaxStatus = new AjaxStatusCore((id, isStarting) => dispatchField('app.isAjaxingCount', (reduxStore.getState().app.isAjaxingCount || 0) + (isStarting ? 1 : -1)));

export default new GraphQLCore({
	graphQLUrl: webserviceContext,
	ajaxStatusCore: ajaxStatus,
	jsLogging: undefined,
	rawPromiseCallback: promise => promise.then(data => {
		const errors = objectAtPath(data, 'data.errors');
		if (errors) {
			const error = errors[0].message;
            MessagePopupCore.addMessage({
                title: 'Webservice Communication Interruption',
                message: 'There was an error communicating with the webservice.',
                subMessage: error
            });
			throw error;
		}
		return data;
	}),
});

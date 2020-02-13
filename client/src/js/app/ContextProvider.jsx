import "core-js/stable";
import React from 'react';
import PropTypes from "prop-types";
import classes from "./jss/classes";
import MobContext, {mobContextValue} from "./mobx/MobContext";
import ClassesContext from "./jss/ClassesContext";

const propTypes = {
	children: PropTypes.object.isRequired,
};
const defaultProps = {};

// put all contexts here for safe keeping and decluttering
// https://reactjs.org/docs/context.html#consuming-multiple-contexts
// "To keep context re-rendering fast, React needs to make each context consumer a separate node in the tree."
const ContextProvider = ({children}) => (
	<ClassesContext.Provider value={classes}>
		<MobContext.Provider value={mobContextValue}>
			{children}
		</MobContext.Provider>
	</ClassesContext.Provider>
);
ContextProvider.propTypes = propTypes;
ContextProvider.defaultProps = defaultProps;

export default ContextProvider;

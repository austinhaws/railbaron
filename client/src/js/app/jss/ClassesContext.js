import {createContext} from "react";
import classes from "./classes";

const ClassesContext = createContext(classes);
ClassesContext.displayName = 'Classes (JSS)';
export default ClassesContext;

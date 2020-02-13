import React from "react";
import WithPageTitle from "./WithPageTitle";

export default class Page {
	/**
	 *
	 * @param component React component for rendering content at this path
	 * @param forward call this function to go to this page
	 * @param path the path to get to this url in Router lingo
	 * @param render (optional) this is called to render this page (pass in the router for parameter matching)
	 * @param title the title of this page to show in the tab
	 */
	constructor({component, forward, path, render, title}) {
		this.data = {
			component,
			wrappedComponent: WithPageTitle(component, title),
		};

		Object.assign(this, {path, forward});
		this.render = router => render ? render(this.data.wrappedComponent, router) : <this.data.wrappedComponent/>;
	}
}

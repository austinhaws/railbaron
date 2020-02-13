import React, {useContext} from "react";
import MobContext from "../mobx/MobContext";

export default class Page {
	/**
	 *
	 * @param Component React component for rendering content at this path
	 * @param forward call this function to go to this page
	 * @param path the path to get to this url in Router lingo
	 * @param render (optional) this is called to render this page (pass in the router for parameter matching)
	 * @param title the title of this page to show in the tab
	 */
	constructor({Component, forward, path, render, title}) {
		Object.assign(this, {path, forward});
		this.render = router => {
            const {appStore} = useContext(MobContext);
            appStore.pageTitle = `RPGGenerator - ${title}`;

            return render ? render(Component, router) : <Component/>;
        }
	}
}

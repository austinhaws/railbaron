let history = null;

export default {
	forward: path => history.push(path),
	get: () => history,
	set: newHistory => history = newHistory,
	back: () => history.goBack(),
};

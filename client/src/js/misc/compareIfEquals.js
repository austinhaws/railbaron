/**
 * Allow functional chaining of comparisons of values that have several levels of possible equalness
 * ie. compareIfEquals((a, b) => a.name.localeCompare(b.name), compareIfEquals((a, b) => a.age - b.age, (a, b) => a.id - b.id)));
 * 		The above compareIfEquals nesting first compares by name and if they are equal then by age if they are equal then by id
 *
 * @param cmp func (a, b) => return -1,0,1 for comparison
 * @param cmpIfEquals if cmp returns 0 then cmpIfEquals is called with: (a, b) => -1, 0, 1
 * @return {function(*=, *=): *}
 */
export default (cmp, cmpIfEquals) => (a, b) => {
	let result = cmp(a, b);
	if (!result) {
		result = cmpIfEquals ? cmpIfEquals(a, b) : result;
	}
	return result;
};

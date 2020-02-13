import {includeIfNotUndefined} from "dts-react-common";

const objectToFields = (obj, sendableFields) => `{${(sendableFields || Object.keys(obj)).filter(k => obj[k] !== null).map(k => includeIfNotUndefined(k, obj[k])).join(' ')}}`;
export default (field, value, sendableFields) => value === undefined ? '' : `${field}: [${value.map(o => objectToFields(o, sendableFields)).filter(s => s).join(',')}]`;

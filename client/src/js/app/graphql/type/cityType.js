import regionType from "./regionType";

export default () => `
    id
    name
    region {
        ${regionType(false)}
    }
`;

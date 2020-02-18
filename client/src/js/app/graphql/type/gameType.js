import playerType from "./playerType";

export default () => `
    phrase
    players {
        ${playerType()}
    }
`;

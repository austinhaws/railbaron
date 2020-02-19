import webservice from "../../../app/webservice/Webservice";

export default () => confirm('Are you sure you want to start a new game?') && webservice.game.startNewGame();

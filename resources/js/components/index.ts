//#region plugin
import Alpine from "alpinejs";
// @ts-ignore
import Tooltip from "@ryangjchandler/alpine-tooltip";
import 'tippy.js/dist/tippy.css';
import '../../css/tippy-theme.css';
Alpine.plugin(Tooltip.defaultProps({
  theme: 'rainbow',
}));
//#endregion

//#region component
import "./seat-layout.component";
import "./room.component";
import "./seat-type.component";
import "./seat-view.component";
import "./movie-page.component";
//#endregion

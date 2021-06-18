import { IEventSystem } from "../../ts-common/events";
import { View } from "../../ts-common/view";
import { Toolbar } from "../../ts-toolbar";
import { ContextMenu, Menu } from "../../ts-menu";
import { IKeyManager } from "../../ts-common/newKeyManager";
import { FileFormat, ICellInfo, IDataWithStyles, ISelection, ISheet, ISpreadsheet, ISpreadsheetConfig, IStylesList, SpreadsheetEvents } from "./types";
import { Exporter } from "./Exporter";
import { DataPage, IFormula } from "../../muon";
export declare class Spreadsheet extends View implements ISpreadsheet {
    container: HTMLElement;
    events: IEventSystem<SpreadsheetEvents>;
    selection: ISelection;
    config: ISpreadsheetConfig;
    toolbar: Toolbar;
    menu: Menu;
    contextMenu: ContextMenu;
    sheetContextMenu: ContextMenu;
    export: Exporter;
    keyManager: IKeyManager;
    private _editLine;
    private _dataStore;
    private _math;
    private _grid;
    private _layout;
    private _tabbar;
    private _colorpicker;
    private _colorpickerPopup;
    private _colorpickerTarget;
    private _actionsManager;
    private _sizes;
    private _buffer;
    private _activeInput;
    private _xlsxProxy;
    private _silencedColorChange;
    private _range;
    private _sheets;
    private _activePage;
    private _focusedSheet;
    private _errorAlert;
    private _editMode;
    private _activeSheetName;
    constructor(container: HTMLElement | string, config: ISpreadsheetConfig);
    destructor(): void;
    paint(): void;
    load(url: string, type?: FileFormat): Promise<any>;
    parse(data: IDataWithStyles | ICellInfo[], type?: any): void;
    serialize(): {
        sheets: any[];
        styles: {};
        columns: {};
        formats: import("./types").IFormats[];
    };
    setValue(cell: string, value: any | any[]): void;
    getValue(cell: string): any | any[];
    getCellIndex(cell: string): any;
    getFormula(cell: string): string | string[];
    getSheets(): ISheet[];
    _getMath(cell: string, page?: DataPage): IFormula;
    eachCell(cb: any, range?: string): void;
    getStyle(cell: string): IStylesList | IStylesList[];
    setStyle(cell: string, style: string | string[] | IStylesList | IStylesList[]): void;
    getFormat(cell: string): any;
    setFormat(cell: string, format: string | string[]): void;
    isLocked(cell: string): boolean;
    lock(cell: string): void;
    unlock(cell: string): void;
    addRow(cell: string): void;
    deleteRow(cell: string): void;
    addColumn(cell: string): void;
    deleteColumn(cell: string): void;
    undo(): void;
    redo(): void;
    startEdit(cell?: string, initialValue?: string): void;
    endEdit(withoutSave?: boolean): void;
    addSheet(name?: string): any;
    removeSheet(id: string): void;
    getActiveSheet(): ISheet;
    private _renameSheet;
    private _changeSheet;
    private _callAction;
    private _initLayout;
    private _generateGridStruct;
    private _checkForMissedCells;
    private _generateNewSheetName;
    private _updateGridSizes;
    private _updateToolbar;
    private _setEventsHandlers;
    private _getErrorWindow;
    private _handleAction;
    private _fillCells;
    private _restoreFocus;
    private _initHotkeys;
    private _render;
}

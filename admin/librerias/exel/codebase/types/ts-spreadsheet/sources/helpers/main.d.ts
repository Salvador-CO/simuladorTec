import { IGrid } from "../../../ts-grid";
import { DataPage } from "../../../muon";
import { ICell, ICellMeta, IRange, IRangeIndex } from "./../types";
export declare function getLetterFromNumber(num: number): string;
export declare function getNumberFromLetter(str: string): number;
export declare function getCellIds(cell: string): ICell | IRange | any;
export declare function getCellIndex(cell: string): {
    row: number;
    col: number;
};
export declare function getCellNameByIndex(rowIndex: number, colIndex: number): string;
export declare function getCellNameById(grid: IGrid, row: string, col: string): string;
export declare function getCellInfo(cell: string, page: DataPage): ICellMeta;
export declare function isRangeId(id: string): boolean;
export declare function getRangeIndexes(range: string): IRangeIndex;
declare type rangeDir = "row" | "col";
export declare function getRangeArray(range: string, dir?: rangeDir): string[];
export declare function getRangeMatrix(range: string, dir?: rangeDir): any[];
export declare function getNextRangeCell(range: string, current: string, dir?: rangeDir): string;
export declare function getPrevRangeCell(range: string, current: string, dir?: rangeDir): string;
export declare function getCellsArray(cells: string): string[];
export declare function extendConfig(target?: {}, source?: {}, deep?: boolean): any;
export declare function isWasmSupported(): boolean;
export declare function fetchFile(url: string, method?: "GET", responseType?: XMLHttpRequestResponseType): Promise<any>;
export {};

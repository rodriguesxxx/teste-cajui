export function sumField<T>(array: T[], field: keyof T): number {
    return array.reduce((acc, curr) => acc + Number(curr[field] || 0), 0);
}

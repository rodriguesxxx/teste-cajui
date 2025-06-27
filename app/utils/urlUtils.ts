export function getResourceUrl(path: string): string {
    const baseUrl = process.env.EXPO_PUBLIC_API_URL;

    if (!path || !baseUrl) return "";

    return `${baseUrl.replace(/\/$/, "")}/storage/${path.replace(/^\//, "")}`;
}

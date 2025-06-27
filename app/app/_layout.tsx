import { useAuth } from "@/hooks/useAuth";
import { RootStackParamList } from "@/types/navigation";
import { DefaultTheme, NavigationProp, ThemeProvider, useNavigation } from "@react-navigation/native";
import { createNativeStackNavigator } from "@react-navigation/native-stack";
import { useFonts } from "expo-font";
import { useEffect } from "react";
import { ActivityIndicator, LogBox, View } from "react-native";
import "react-native-reanimated";
import NotFoundScreen from "./+not-found";
import HomeScreen from "./home";
import LoginScreen from "./login";
import { QueryClient, QueryClientProvider } from "@tanstack/react-query";
import Toast from "react-native-toast-message";

const queryClient = new QueryClient();

export default function RootLayout() {
    LogBox.ignoreAllLogs(true);

    const navigation = useNavigation<NavigationProp<RootStackParamList>>();

    const [loaded] = useFonts({
        SpaceMono: require("../assets/fonts/SpaceMono-Regular.ttf"),
    });

    const { loading, logged } = useAuth();

    useEffect(() => {
        if (!logged) {
            navigation.navigate("login");
        }
    }, [navigation, logged]);

    if (!loaded || loading) {
        return (
            <View style={{ flex: 1, justifyContent: "center", alignItems: "center" }}>
                <ActivityIndicator size='large' color='#007BFF' />
            </View>
        );
    }

    const Stack = createNativeStackNavigator();

    return (
        <QueryClientProvider client={queryClient}>
            <ThemeProvider value={DefaultTheme}>
                <Stack.Navigator screenOptions={{ headerShown: false }}>
                    <Stack.Screen name='login' component={LoginScreen} />
                    <Stack.Screen name='home' component={HomeScreen} />
                    <Stack.Screen name='+not-found' component={NotFoundScreen} />
                </Stack.Navigator>
            </ThemeProvider>
            <Toast />
        </QueryClientProvider>
    );
}

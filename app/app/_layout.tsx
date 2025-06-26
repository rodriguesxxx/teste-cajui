import { useAuth } from "@/hooks/useAuth";
import { RootStackParamList } from "@/types/navigation";
import { DefaultTheme, NavigationProp, ThemeProvider, useNavigation } from "@react-navigation/native";
import { createNativeStackNavigator } from "@react-navigation/native-stack";
import { useFonts } from "expo-font";
import { useEffect } from "react";
import { ActivityIndicator, View } from "react-native";
import "react-native-reanimated";
import NotFoundScreen from "./+not-found";
import HomeScreen from "./home";
import LoginScreen from "./login";

export default function RootLayout() {
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
        <ThemeProvider value={DefaultTheme}>
            <Stack.Navigator screenOptions={{ headerShown: false }}>
                <Stack.Screen name='login' component={LoginScreen} />
                <Stack.Screen name='home' component={HomeScreen} />
                <Stack.Screen name='+not-found' component={NotFoundScreen} />
            </Stack.Navigator>
        </ThemeProvider>
    );
}

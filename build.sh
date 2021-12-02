echo "Current directory:" $(pwd);
KUBEDIR="./kube";
NAMESPACE="default";

PS3="Select option you want to do: ";
select opt in apply delete info quit;
do
	case $opt in
		"delete"|"apply"|"info")
			if [ "$opt" != "info" ]; then
			# if action is equal with apply or delete will do:
				# find "$KUBEDIR" -name "*.yaml" ! -name namespace.yaml | while read fname; 
				# do
				# 	echo "Processing: $opt $fname ...";
				# 	kubectl $opt -f $fname;
				# done

                kubectl $opt -f $KUBEDIR
			else
			# if action is nor equal with apply or delete will do:
				echo "Enter your cluster namespace, the default is getting all namespace";
				read -p "namespace: " input_namespace;
				if [ ! -z "$input_namespace" ]; then
					echo "Checking kubernetes cluster with namespace: $input_namespace";
					echo "Getting info from kubernetes cluster: ";
					NAMESPACE="$input_namespace";
					kubectl get namespaces;
					kubectl get pods -n "$NAMESPACE";
					kubectl get services -n "$NAMESPACE";
					kubectl get configmaps -n "$NAMESPACE";
					break;
				fi
			fi
			echo "Getting info from all namespace kubernetes cluster: ";
			kubectl get namespaces;
			kubectl get pods --all-namespaces;
			kubectl get services --all-namespaces;
			kubectl get configmaps --all-namespaces;
		break
		;;
		*)
			echo "Operation cancelled.";
			break
		;;
	esac
done

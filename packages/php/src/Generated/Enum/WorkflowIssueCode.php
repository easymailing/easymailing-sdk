<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum WorkflowIssueCode: string
{
    case MissingTrigger = 'missing_trigger';
    case MissingSteps = 'missing_steps';
    case MissingEnd = 'missing_end';
    case TriggerPosition = 'trigger_position';
    case TriggerEntryMismatch = 'trigger_entry_mismatch';
    case ForwardTargetRequired = 'forward_target_required';
    case BranchingNodeNext = 'branching_node_next';
    case BranchTargetRequired = 'branch_target_required';
    case BranchConvergenceRequired = 'branch_convergence_required';
    case UnreachableNode = 'unreachable_node';
    case ForEachBoundary = 'for_each_boundary';
    case ForEachForbiddenStep = 'for_each_forbidden_step';
    case AiAgentApprovalInForEach = 'ai_agent_approval_in_for_each';
    case InvalidBranches = 'invalid_branches';
    case PercentageTotal = 'percentage_total';
    case MissingCondition = 'missing_condition';
    case UnexpectedBody = 'unexpected_body';
    case InvalidShape = 'invalid_shape';
    case ConditionStructureLocked = 'condition_structure_locked';
    case RootSubjectMismatch = 'root_subject_mismatch';
    case UnknownPiece = 'unknown_piece';
    case PieceUnavailable = 'piece_unavailable';
    case MissingConfiguration = 'missing_configuration';
    case InvalidConfiguration = 'invalid_configuration';
    case InvalidValue = 'invalid_value';
    case IncompatibleValue = 'incompatible_value';
    case TooLong = 'too_long';
    case InvalidReference = 'invalid_reference';
    case InvalidTextToken = 'invalid_text_token';
    case DataUnavailable = 'data_unavailable';
    case DataTypeMismatch = 'data_type_mismatch';
    case TransformIncompatible = 'transform_incompatible';
    case TransformUnsupported = 'transform_unsupported';
    case ReservedField = 'reserved_field';
    case DuplicateField = 'duplicate_field';
    case FieldUnsupported = 'field_unsupported';
    case FieldNotWritable = 'field_not_writable';
    case OperationUnsupported = 'operation_unsupported';
    case RecordTypeUnsupported = 'record_type_unsupported';
    case ConditionUnsupported = 'condition_unsupported';
    case RecordFieldNeedsMatches = 'record_field_needs_matches';
    case UnknownFilterField = 'unknown_filter_field';
    case InvalidFilterOperator = 'invalid_filter_operator';
    case InvalidFilterValue = 'invalid_filter_value';
    case InvalidFilterReference = 'invalid_filter_reference';
    case InvalidContactFilter = 'invalid_contact_filter';
    case FilterUnsupported = 'filter_unsupported';
    case WaitDateUnsupported = 'wait_date_unsupported';
    case WaitChangeUnsupported = 'wait_change_unsupported';
    case ForEachUnsupported = 'for_each_unsupported';
    case TriggerUnsupported = 'trigger_unsupported';
    case ExitWhenUnavailable = 'exit_when_unavailable';
    case ExitEventUnsupported = 'exit_event_unsupported';
    case ExitFilterUnsupported = 'exit_filter_unsupported';
    case WebhookWithoutDuplicateKey = 'webhook_without_duplicate_key';
    case WritesListenedField = 'writes_listened_field';
    case InstructionsTooLong = 'instructions_too_long';
    case TaskTooLong = 'task_too_long';
    case TextTooLong = 'text_too_long';
    case TitleTooLong = 'title_too_long';
    case AgentNotFound = 'agent_not_found';
    case AgentNotPublished = 'agent_not_published';
    case AgentArchived = 'agent_archived';
    case AgentAccessDenied = 'agent_access_denied';
    case McpConnectionUnavailable = 'mcp_connection_unavailable';
    case ResourceUnavailable = 'resource_unavailable';
    case MailboxBurstInLoop = 'mailbox_burst_in_loop';
    case AttachmentMissing = 'attachment_missing';
    case SequenceUnavailable = 'sequence_unavailable';
    case SequenceNotAllowed = 'sequence_not_allowed';
    case ReminderRequiresDueAndAssignee = 'reminder_requires_due_and_assignee';
    case TaskReminderRequirements = 'task_reminder_requirements';
    case HeaderReserved = 'header_reserved';
    case SecretValueRequired = 'secret_value_required';
    case SecretHeaderDynamicUrl = 'secret_header_dynamic_url';
    case SecretTooLong = 'secret_too_long';
    case AudienceMismatch = 'audience_mismatch';
    case CapabilityMissing = 'capability_missing';
    case EcommerceResourceMissing = 'ecommerce_resource_missing';
    case MarketingResourceMissing = 'marketing_resource_missing';
    case EcommerceStoreMissing = 'ecommerce_store_missing';
    case StoreAudienceMissing = 'store_audience_missing';
    case CalendarUnavailable = 'calendar_unavailable';
    case BookingPageUnavailable = 'booking_page_unavailable';
    case MailboxUnavailable = 'mailbox_unavailable';
    case ConnectionRequired = 'connection_required';
    case CapabilityRequired = 'capability_required';
    case WorkPermissionRequired = 'work_permission_required';
    case PlanRequired = 'plan_required';
    case ListOverFieldLimit = 'list_over_field_limit';
}
